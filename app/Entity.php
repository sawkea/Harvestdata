<?php

namespace App;

class Entity {

    public function hydrate(array $data) {
       foreach ($data as $key => $value) {
          // One gets the setter's name matching the attribute.
          $method = 'set'.ucfirst($key);

          // If the matching setter exists
          if (method_exists($this, $method)) {
             // One calls the setter.
             $this->$method($value);
          }
       }
    }
   // Getters/Setters and methods ...
}