<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KMeans {

    public $data;
    public $k;

    public function __construct($data) {
        $this->data = $data;
        $this->k = 12;
    }

    public function assignCentroids($centroids) {
        $mapping = array();
    
        foreach($this->data as $documentID => $document) {
            $minDist = 100;
            $minCentroid = null;
            foreach($centroids as $centroidID => $centroid) {
                $dist = 0;
                foreach($centroid as $dim => $value) {
                    $dist += abs($value - $document[0][$dim]);
                }
                if($dist < $minDist) {
                    $minDist = $dist;
                    $minCentroid = $centroidID;
                }
            }
            $mapping[$documentID] = $minCentroid;
        }
    
        return $mapping;
    }

    public function formatResults($mapping, $centroids) {
        $result  = array();
        // $result['centroids'] = $centroids;
        foreach($mapping as $documentID => $centroidID) {
            $result[$centroidID][$this->data[$documentID][1]] = implode(',', $this->data[$documentID][0]);
        }
        return $result;
    }

    public function initialiseCentroids(array $data) {
        $dimensions = count($data[0]);
        $centroids = array();
        $dimmax = array();
        $dimmin = array(); 
    
        // var_dump($data);
    
        foreach($data as $document) {
            foreach($document as $dim => $val) {
                if(!isset($dimmax[$dim]) || $val > $dimmax[$dim]) {
                    $dimmax[$dim] = $val;
                }
                if(!isset($dimmin[$dim]) || $val < $dimmin[$dim]) {
                    $dimmin[$dim] = $val;
                }
            }
        }
        for($i = 0; $i < $this->k; $i++) {
            $centroids[$i] = $this->initialiseCentroid($dimensions, $dimmax, $dimmin);
        }

        return $centroids;
    }

    public function initialiseCentroid($dimensions, $dimmax, $dimmin) {
        $total = 0;
        $centroid = array();
        for($j = 0; $j < $dimensions; $j++) {
            $centroid[$j] = (rand($dimmin[$j] * 1000, $dimmax[$j] * 1000));
            $total += $centroid[$j] * $centroid[$j];
        }
        $centroid = $this->normaliseValue($centroid, sqrt($total));
        return $centroid;
    }

    public function normaliseValue(array $vector, $total) {
        foreach($vector as &$value) {
            $value = $value/$total;
        }
        return $vector;
    }

    public function run() {
        
            $vector_data = array();
            foreach ($this->data as $key => $value) {
                $vector_data[$key] = $value[0];
            }
        
            $centroids = $this->initialiseCentroids($vector_data);
            $mapping = array();
        
            while(true) {
                $new_mapping = $this->assignCentroids($centroids);
                $changed = false;
                foreach($new_mapping as $documentID => $centroidID) {
                    if(!isset($mapping[$documentID]) || $centroidID != $mapping[$documentID]) {
                        $mapping = $new_mapping;
                        $changed = true;
                        break;
                    }
                }
                if(!$changed){
                    return $this->formatResults($mapping, $centroids); 
                }
                // print("Iterated!\n");
                $centroids  = $this->updateCentroids($mapping, $vector_data); 
            }
        }

    public function updateCentroids($mapping, $data) {
        $centroids = array();
        $counts = array_count_values($mapping);
    
        foreach($mapping as $documentID => $centroidID) {
            foreach($data[$documentID] as $dim => $value) {
                if(!isset($centroids[$centroidID][$dim])) {
                    $centroids[$centroidID][$dim] = 0;
                }
                $centroids[$centroidID][$dim] += ($value/$counts[$centroidID]); 
            }
        }
    
        if(count($centroids) < $this->k) {
            $centroids = array_merge($centroids, $this->initialiseCentroids($data, $this->k - count($centroids)));
        }
    
        return $centroids;
    }
}


?>