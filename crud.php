<?php 

	include_once "connection.php";

    class Crud extends Connection
    {
    	
    	public function viewData($query)
    	{
    		$data = $this->connect()->query($query);

    		$result = array();
    		if(empty($data))
    		{
    			return $data;
    		}
    		else
    		{
    			while($isi = $data->fetch_assoc())
	    		{
	    			$result[] = $isi;
	    		}
    		}

    		return $result;
    	}

    	public function createData($query)
    	{
    		$data = $this->connect()->query($query);

    		$result = array();

    		if($data)
    		{
    			return true;
    		}
    		else
    		{
    			$result['code'] = 403;
    			$result['message'] = "FORBIDDEN";
    		}

    		echo json_encode($result);
    	}


    	public function updateData($request, $id_user)
    	{
    		$data = $this->connect()->query($request.$id_user);

    		$result = array();

    		if($data)
    		{
    			$result['code'] = 202;
    			$result['message'] = "ACCEPTED";
    		}
    		else
    		{
    			$result['code'] = 403;
    			$result['message'] = "FORBIDDEN";
    		}

    		echo json_encode($result);
    	}

    	public function deleteData($query)
    	{
    		$data = $this->connect()->query($query);

    		$result = array();

    		if($data)
    		{
    			$result['code'] = 202;
    			$result['message'] = "Data has been deleted.";
    		}
    		else
    		{
    			$result['code'] = 403;
    			$result['message'] = "FORBIDDEN";
    		}

    		echo json_encode($result);
    	}

        public function rightJoinTable($tableOne, $foreignKey, $tableTwo, $primaryKey)
        {
            $query = "SELECT $tableOne.*, $tableTwo.* FROM $tableOne RIGHT JOIN $tableTwo ON $tableTwo.$primaryKey = $tableOne.$foreignKey";

            $data = $this->connect()->query($query);

            $result = array();
            if(empty($data))
            {
                $result['code'] = 000; // Kode apa ini wkwk
                $result['message'] = "No Data";
            }
            else
            {
                while($isi = $data->fetch_assoc())
                {
                    $result[] = $isi;
                }
            }

            echo json_encode($result);
        }

        /*
        * @param $uniqfield = field unik pada table user
        * @param $nilai = nilai dari $uniqfield
        * @param $table = table target mis. table user
        */

        public function getId($uniqfield, $nilai, $table)
        {
            $query = "SELECT id_user FROM $table WHERE $uniqfield='$nilai'";
            $result = $this->connect()->query($query);
            $res = $result->fetch_assoc();
            return $res['id_user'];
        }

    	public function validateRequest($request = array())
    	{
    		$result = array();
    		
    		for($i = 0; $i < count($request); $i++)
    		{
    			if($request[$i] == NULL)
    			{
    				$result['code'] = 400;
    				$result['message'] = "BAD REQUEST";
    				echo json_encode($result);
    				exit();
    			}
    		}
    	}

    	// Menghindari SQL injection
    	public function cleanRequest($request)
    	{
    		return mysqli_real_escape_string($this->connect(),$request);
    	}

    }


 ?>