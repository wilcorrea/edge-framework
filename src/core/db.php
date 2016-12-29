<?php

namespace Core;

final class db extends kernel
{
    // defaults
    private $url  = MONGODB_IP;
    private $port = '27017';
    private $base = 'edge';
    private $errors;

    /**
     * Private function for display errors (matchs in tray|catch blocks)
     *
     * Private variable "errors" define if this function retur errors (defaut - development)
     */
    private function __ERRORSTRYCATCH__($e)
    {
        // check status code
        if ($this->errors == true) {
            $filename = basename(__FILE__);
            echo "<br><br>Exception: ".$e->getMessage()."<br>";
            echo "In File: ".$e->getFile()."<br>";
            echo "In Line: ".$e->getLine()."<br>";
        }
    }

    private function wc()
    {
        // Construct a write concern
        return new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY,
            100);
    }

    private function rp()
    {
        // Construct a read preference
        return new \MongoDB\Driver\ReadPreference(\MongoDB\Driver\ReadPreference::RP_SECONDARY_PREFERRED,
            []);
    }

    private function open()
    {
        return new \MongoDB\Driver\Manager("mongodb://".$this->url.":".$this->port."/".$this->base);
    }

    private function bulk()
    {
        return new \MongoDB\Driver\BulkWrite;
    }

    private function query($filter = false)
    {
        if ($filter) {
            return new \MongoDB\Driver\Query($filter);
        } else {
            return new \MongoDB\Driver\Query([]);
        }
    }

    /**
     * $database {string} set database for operation
     * $options  {array}  set options.
     */
    function __construct($database = false, $options = false)
    {
        // set default variables
        $this->errors = $options['err'] ? $options['err'] : true;
        // check if have database
        if (!$database) {
            return false;
        } else {
            // define data base
            $this->base = $database;
        }
    }

    public function create($collection, $document)
    {
        // open manager
        $manager = self::open();
        // open bulk
        $bulk    = self::bulk(['ordered' => true]);
        // bulk insert
        $bulk->insert($document);
        //
        try {
            // grab result
            $result = $manager->executeBulkWrite($this->base.'.'.$collection,
                $bulk, self::wc());
            // check
            if ($result->getInsertedCount() === 1) {
                return true;
            } else {
                return false;
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            // shutdown error
            self::__ERRORSTRYCATCH__($e);
            return false;
        }
    }

    public function reader($collection, $document = false, $filter = false)
    {
        // define document
        $document = $document ? $document : [];
        // define query
        $query    = self::query($filter) ? self::query($filter) : self::query();
        // open manager
        $manager  = self::open();
        //
        try {
            // cursor
            $cursor    = $manager->executeQuery($this->base.'.'.$collection,
                $query, self::rp());
            // store
            $multiples = [];
            // loop
            foreach ($cursor as $document) {
                array_push($multiples, $document);
            }

            // check if have result
            if (count($multiples) == 0) {
                return false;
            } else {
                return $multiples;
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            // shutdown error
            self::__ERRORSTRYCATCH__($e);
            return false;
        }
    }

    public function update($collection, $filter, $newObj, $options = false)
    {
        // define options
        if ($options != false && is_array($options)) {
            $options = array_merge(["multi" => false, "upsert" => false],
                $options);
        } else {
            $options = ["multi" => false, "upsert" => false];
        }
        // open manager
        $manager = self::open();
        // open bulk
        $bulk    = self::bulk();
        // bulk update
        $bulk->update($filter, $newObj, $options);
        //
        try {
            // grab result
            $result = $manager->executeBulkWrite($this->base.'.'.$collection,
                $bulk, self::wc());
            // check
            if ($result->getModifiedCount() >= 1) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // shutdown error
            self::__ERRORSTRYCATCH__($e);
            return false;
        }
    }

    public function delete($collection, $filter, $limit = false)
    {
        /**
         *  WARNING! $limit zero "0" delete all matches in collection! RISK ATENTION HERE!
         *  Default param is 0...
         */
        $limit   = (is_bool($limit) && $limit == true) ? ["limit" => 1] : ["limit" => 0];
        // open manager
        $manager = self::open();
        // open bulk
        $bulk    = self::bulk();
        // bulk delete
        $bulk->delete($filter, $limit);
        //
        try {
            // grab result
            $result = $manager->executeBulkWrite($this->base.'.'.$collection,
                $bulk, self::wc());
            // check
            if ($result->getDeletedCount() >= 1) {
                return true;
            } else {
                return false;
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            // shutdown error
            self::__ERRORSTRYCATCH__($e);
            return false;
        }
    }
}