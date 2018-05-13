<?php
class Movie implements JsonSerializable {
	private $mediaId;
	private $title;
	private $year;
	private $first;
    private $last;
    private $middle;
    private $length;

	public function getMedia() { return $this->mediaId; }
	public function getTitle() { return $this->title; }
	public function getYear() { return $this->year; }
	public function getFirst() { return $this->first; }
    public function getLast() { return $this->last; }
    public function getMiddle() { return $this->middle; }
    public function getLength() { return $this->length; }
	public function getDirectorFullName() { return $this->getFirst(). " " . $this->getMiddle(). " " . $this->getLast();}

	public function jsonSerialize() {
        return json_encode(array(
			"mediaId"	=> $this->getMedia(),
			"title" 	=> str_replace(" ", "_", $this->getTitle()),
			"year" 		=> str_replace(" ", "_", $this->getYear()),
			"first" 	=> str_replace(" ", "_", $this->getFirst()),
			"last" 		=> str_replace(" ", "_", $this->getLast()),
			"middle" 	=> str_replace(" ", "_", $this->getMiddle()),
			"length" 	=> $this->getLength()
		));
	}
}
?>
