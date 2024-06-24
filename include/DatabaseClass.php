<?php
class database
{
    private $host;
    private $user;
    private $password;
    private $database;
    public $conn;


    function __construct()
    {


        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->database = 'facultymanagementsystem';
        include_once 'DatabaseConnectionSingleton.php';
        $this->conn = Singleton::getinstance();
        $this->connect();
    }



    function connect()
    {
        if (!$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database)) {
            throw new Exception("Error:not connected to the server or not found database.");
        }
    }

    function close()
    {
        $this->conn->close();
    }

    function insert($sql)
    {
        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function update($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("Error:can not execute the query");
        } else {
            return true;
        }
    }

    function delete($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("Error: not deleted");
            return false;
        } else {
            return true;
        }
    }

    function selectQuery($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }

    function select($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            return false;
        }

        if ($row = $result->fetch_array(MYSQLI_ASSOC))
            $result->close();

        return $row;
    }

    public function isEnrolled($student, $course, $assignID)
    {
        $query = "SELECT * FROM enrollment WHERE student_id = '$student';";
        $result = $this->conn->query($query);
        $counting = 0;

        while ($row = $result->fetch_assoc()) {
            if (!strcmp($course, $row["course_id"]) && !strcmp($assignID, $row["assign_id"])) {
                $counting++;
            }
        }
        if ($counting != 0) {
            return true;
        } else {
            return false;
        }
    }

    function isScheduledInSameTime($student, $day, $time)
    {
        $query = "SELECT assign_courses.start_time,assign_courses.day FROM enrollment 
        LEFT JOIN assign_courses ON assign_courses.id = enrollment.assign_id
        where enrollment.student_id = '$student'";
        $result = $this->conn->query($query);

        $counting = 0;
        while ($row = $result->fetch_assoc()) {
            if (!strcmp($day, $row["day"]) && !strcmp($time, $row["start_time"])) {
                $counting++;
            }
        }

        if ($counting != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isAssignCourse($day, $hall, $time)
    {
        $counting = 0;
        $query = "SELECT * FROM assign_courses WHERE day ='$day';";
        $result = $this->conn->query($query);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            if (!strcmp($hall, $row["Hall"]) && !strcmp($time, $row["start_time"])) {
                $counting++;
            }
        }

        if ($counting != 0) {
            return true;
        } else {
            return false;
        }
    }

    function selectCourseTimeTable($student_username, $day, $time)
    {
        $sql = "SELECT Hall,day,start_time,name FROM ((enrollment
        JOIN course ON enrollment.course_id = course.code)
        JOIN assign_courses ON assign_courses.id = enrollment.assign_id)
        WHERE enrollment.student_id = '$student_username' AND day = '$day' AND start_time = '$time'";

        if (!$result = $this->conn->query($sql)) {
            return false;
        }

        if ($row = $result->fetch_array(MYSQLI_ASSOC))
            $result->close();

        return $row;
    }
}
