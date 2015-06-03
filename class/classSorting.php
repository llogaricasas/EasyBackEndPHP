<?php
class Sorting{
	
	private $array;
	
	public function __construct($array){
		$this->array = $array;
	}
	public function AlreadySorted(){
		$temp = null;
		$sorted = true;
		foreach($this->array as $value){
			if($temp<>null){
				if($value>$temp){						
					$sorted = false;
					break;
				}
			} else {
				$temp = $value;
			}	
		}
		return $sorted;
	}
	public function BubbleSort(){
		$size = count($this->array);
		for($i=0;$i<$size;$i++){
			for($j=0;$j<$size-1-$i;$j++){
				if($this->array[$j+1] < $this->array[$j]){
					$temp = $this->array[$j];
					$this->array[$j] = $this->array[$j+1];
					$this->array[$j+1] = $temp;
				}
			}
		}
		return $this->array;
	}
	public function BucketSorting($BucketSize){
		$highest = max($this->array);
		$numbuckets = ceil($highest/$BucketSize);
		$buckets = array();
		$sorted = array();
		for($i=0;$i<$numbuckets;$i++){
			$buckets[] = array();
		}
		foreach($this->array as $value){
			$position = floor($value/$BucketSize);
			$buckets[$position][] = $value;
		}
		for($i=0;$i<$numbuckets;$i++){
			for($j=0;$j<count($buckets[$i]);$j++){
				for($k=0;$k<count($buckets[$i])-1-$j;$k++){
					if($buckets[$i][$k+1] < $buckets[$i][$k]){
						$temp = $buckets[$i][$k];
						$buckets[$i][$k] = $buckets[$i][$k+1];
						$buckets[$i][$k+1] = $temp;
					}
				}
			}
		}
		foreach($buckets as $sortedBucket){
			for($i=0;$i<count($sortedBucket);$i++){
				$sorted[] = $sortedBucket[$i];
			}
		}
		return $sorted;
	}
}
?>
