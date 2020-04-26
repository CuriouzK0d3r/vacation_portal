<?php

require_once "Database.php";
class Applications
{
    private $appls;
    private static $instance = null;

    private function __construct()
    {
        $this->appls = array();
        $database = Database::getInstance();
        $this->appls = $database->select("SELECT * FROM application JOIN user ON application.user_id=user.id", array());
    }

    /**
     * Implements the singleton design pattern. Guarantees that there is only one active instance of the Database at runtime.
     * @return Database|null
     */
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Applications();
        }

        return self::$instance;
    }

    public function addApplication($datefrom, $dateto, $reason, $email) {
        $database = Database::getInstance();
        $id = $database->select("SELECT id FROM user WHERE email=:email", array(":email" => $email))[0]['id'];
        try {
            $days = (new DateTime($datefrom))->diff(new DateTime($dateto))->days;
            $database->insert("INSERT INTO application (date_submitted, date_from, date_to, Reason, days_requested, user_id, status)
                VALUES (NOW(), :datefrom, :dateto, :reason, :days, :id, 'pending');", array(":datefrom" => $datefrom,
                ":dateto" => $dateto, ":reason" => $reason, ":id" => $id, ':days' => $days));
        } catch (Exception $e) {
            print $e;
        }

    }

    public function getApplicationsForUser($email)
    {
        $apl = array();
        foreach ($this->appls as $app) {
            if ($app['email'] == $email)
                array_push($apl, $app);
        }

        return $apl;
    }
}