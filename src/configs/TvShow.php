<?php

/**
*
*/
class TvShow implements JsonSerializable {
    private $mediaId;
    private $title;
    private $year;
    private $first;
    private $last;
    private $middle;
    private $numberofseasons;
    private $completion_status;
    private $number_of_episodes;

    public function getMedia() { return $this->mediaId; }
    public function getTitle() { return $this->title; }
    public function getYear() { return $this->year; }
    public function getFirst() { return $this->first; }
    public function getLast() { return $this->last; }
    public function getMiddle() { return $this->middle; }
    public function getNumberOfSeasons() { return $this->numberofseasons; }
    public function getCompletionStatus() { return $this->completion_status; }
    public function getNumberOfEpisodes() { return $this->number_of_episodes; }
    public function getDirectorFullName() { return $this->getFirst(). " " . $this->getMiddle(). " " . $this->getLast();}

    public function jsonSerialize() {
        return json_encode(array(
            "mediaId"               => $this->getMedia(),
            "title"                 => str_replace(" ", "_", $this->getTitle()),
            "year"                  => str_replace(" ", "_", $this->getYear()),
            "first"                 => str_replace(" ", "_", $this->getFirst()),
            "last"                  => str_replace(" ", "_", $this->getLast()),
            "middle"                => str_replace(" ", "_", $this->getMiddle()),
            "numberofseasons"       => $this->getNumberOfSeasons(),
            "completion_status"     => $this->getCompletionStatus(),
            "number_of_episodes"    => $this->getNumberOfEpisodes()
        ));
    }
}
?>
