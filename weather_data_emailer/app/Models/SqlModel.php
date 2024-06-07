<?php
 
namespace App\Models; 
use CodeIgniter\Model;
class SqlModel extends Model
{


                function insertRecord($table, $colums)                        {
                $db      = \Config\Database::connect();
                $builder = $db->table($table);
                if ($builder->insert($colums))
                return  $db->insertID();
                else
                return false;  // echo  $db->getLastQuery();die; 
               
                }

                function updateRecord($table, $colums, $condition)            {

                $db      = \Config\Database::connect();
                $builder = $db->table($table);




                if ( $builder->where($condition)->set($colums)->update())
                return true;
                else
                return false;
                }
                function deleteRecord($table, $condition)                     {
                $db      = \Config\Database::connect();
                $builder = $db->table($table);
                if ($builder->delete($condition))
                return true;
                else
                return false; 
                }

                function getQuery($sql)                                      {
                $fetchRow = $this->db->query($sql);
                return $fetchRow;
                }
                function runQuery($sql, $flag = '')                          {
                // echo $sql; die;
                $this->result = $this->db->query($sql);
                if ($flag)
                return $this->result->getRow();
                else
                return $this->result->getResult();
                }


}?>