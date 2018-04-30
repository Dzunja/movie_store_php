<?php
abstract class ActiveRecord{
    public static function getAll($filter="")//mozemo da uvedemo filtraciju
    {
        $q = mysqli_query(Database::getInstance(), "select * from " .static::$table ." ". $filter);
        $res = array();
        while ($rw = mysqli_fetch_object($q,get_called_class()))//naziv klase koja je aktivirala ovaj metod, dobijamp niz objekata klase category
            $res[]=$rw;//niz objekata klase Category
            return $res;
        }

    public static function get($id){
         $q = mysqli_query(Database::getInstance(), "select * from " .static::$table . " where " .static::$key." = " . $id);//def u classes Category
        return mysqli_fetch_object($q,get_called_class());
}
    public function update(){
        $q = "update " . static::$table . " set ";
        foreach($this as $k=>$v){
            if($k==static::$key) continue;//ignorisemo ga
           $q.=$k."='" .$v."',";
        }
        $q=rtrim($q,",");//brisanje desnog zareza
        $keyField=static::$key;
        $q.=" where " .static::$key." = " .$this->$keyField;
       mysqli_query(Database::getInstance(),$q);
	   print_r($q);
    }

    /**
     *
     */
    public function save()
    {
       
        $fields = get_object_vars($this);//asocijativi niz sa kljucevima i vrednostima
        $keys = array_keys($fields);
        $values = array_values($fields);
        $q = "insert into " . static::$table . "(";
        $q .= implode(",", $keys);
        $q .= ") values ('";
        $q .= implode("','", $values);
        $q .=" ')";
			print_r($q);
        $conn=Database::getInstance();
        mysqli_query($conn, $q);
        $keyField=static::$key;
        echo $this->$keyField=mysqli_insert_id($conn);
		print_r($fields);
	

    }

        public static function delete($id){
           $q= "delete from " .static::$table . " where " . static::$key . " = " . $id;

           mysqli_query(Database::getInstance(),$q);

        }


    }