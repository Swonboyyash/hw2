<?php

/**
 *
 */
class Actor implements JsonSerializable {
    private $actorId;
    private $first;
    private $last;
    private $middle;
    private $location;
    private $date_of_birth;

    public function getActorId() { return $this->actorId; }
    public function getFirst() { return $this->first; }
    public function getLast() { return $this->last; }
    public function getMiddle() { return $this->middle; }
    public function getLocation() { return $this->location; }
    public function getDateOfBirth() { return $this->date_of_birth; }
    public function getActorFullName() { return $this->first . " " . $this->middle . " " . $this->last; }

    public function jsonSerialize() {
        return json_encode(array(
                "actorId"   => $this->getActorId(),
                "first"     => str_replace(" ", "_", $this->getFirst()),
                "last"      => str_replace(" ", "_", $this->getLast()),
                "middle"    => str_replace(" ", "_", $this->getMiddle()),
                "location"  => str_replace(" ", "_", $this->getLocation()),
                "dob"       => str_replace(" ", "_", $this->getDateOfBirth())
        ));
    }

}


?>
