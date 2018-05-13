<?php
class UserProfile implements JsonSerializable {
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $favorite_actor;
    private $favorite_genre;
    private $favorite_tv_show;
    private $favorite_movie;
    private $user_id;
    private $username;


    public function getFirstName() { return $this->first_name; }
    public function getLastName() { return $this->last_name; }
    public function getDOB() { return $this->date_of_birth; }
    public function getFaveActor() { return $this->favorite_actor; }
    public function getFaveGenre() { return $this->favorite_genre; }
    public function getFaveTVShow() { return $this->favorite_tv_show; }
    public function getFaveMovie() { return $this->favorite_movie; }
    public function getUserID() { return $this->user_id; }
    public function getUsername() { return $this->username; }

    public function jsonSerialize() {
        return [
            'firstName'	=> $this->getFirstName(),
            'lastName'	=> $this->getLastName(),
            'dob'		=> $this->getDOB(),
            'faveactor' => $this->getFaveActor(),
            'favegenre' => $this->getFaveGenre(),
            'favemovie' => $this->getFaveMovie(),
            'favetvshow'=> $this->getFaveTVShow(),
            'userId'    => $this->getUserID(),
            'username'  => $this->getUsername()
        ];
    }
}
?>
