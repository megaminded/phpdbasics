<?php
class User
{
    private $user_name;
    private $email;
    private $password;
    private $connection;
    public function __construct($connection)
    {
        $this->connection   = $connection;
    }
    public function save($credentials)
    {
        $this->user_name    = $credentials['name'];
        $this->email        = $credentials['email'];
        $this->password     = $credentials['password'];

        if ($this->validate()) {
            echo "Saved";
        } else {
            echo "Not saved!";
        }
    }
    private function validate()
    {
        // Validate the input
        return $this->prepare();
    }
    private function prepare()
    {
        $statement = $this->connection->prepare("INSERT INTO users (user_name, email, user_password) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $this->user_name, $this->email, $this->password);
        return $this->execute($statement);
    }
    private function execute($statement)
    {
        return $statement->execute();
    }

    public function find($statement)
    {
        $query = $this->connection->query($statement);
        if ($query->num_rows > 0) {
            return $query;
        } else {
            throw new \Exception("No record found",);
        }
    }

    private function result($query)
    {
    }
}