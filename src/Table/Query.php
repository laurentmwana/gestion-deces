<?php

namespace App\Table;

use DateTime;
use PDO;

class Query {

    /**
     * instance de PDO (pour se connecter à la base de données)
     *
     * @var PDO
     */
    private $pdo;

    /**
     * Conditions where pour grouper données dans la base de données
     *
     * @var array
     */
    private $where = [];

    /**
     * Le nom de la table
     *
     * @var string 
     */
    private $from;

    /**
     * Les données envoyer 
     *
     * @var array
     */
    private $params = [];

    
    /**
     * Les chemps à afficher 
     * @var array
     */
    private $fields = [];


     /**
     *
     *  Organiser par id, etc. (trier, grouper par)
     * @var array
     */
    private $by = [];

    /**
     * limiter les nombres lignes à afficher 
     *
     * @var integer
     */
    private $limit;

    /**
     *
     * Faire uen recherche depuis la base de données
     * 
     * @var array
     */
    private $like = [];

    /**
     * Jointures en inner join
     * @var array
     */
    private $innerJoin = [];

    /**
     * Jointures en left join
     * @var array
     */
    private $leftJoin = [];

    /**
     *
     * Jointures en right join
     * @var array
     */
    private $rightJoin = [];

    /**
     * Jointures outher join
     *
     * @var array
     */
    private $outerJoin = [];

    /**
     *
     * @var integer
     */
    private $offset;

  

    /**
     * compter les nombres de lignes 
     *
     * @var string
     */
    private $count;

    /**
     * Valeur nommée 
     *
     * @var array
     */
    private $values = [];

    /**
     * Permet de définir la date et l'heure (maintenant = now)
     *
     * @var Datetime
     */
    private $datetime;

    /**
     * classe de recuperation
     *
     * @var string
     */
    private $classMapping;


   /**
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


 

    /**
     * Grouper les données depuis la base données 
     *
     * @param string $by
     * @param string $order
     * @return self
     */
    public function by (string $by, string $order): self {
        $this->by = array_merge($this->by, ["$by $order"]);
        return $this;
    }

    /**
     *  Valeur nommée 
     *
     * @param string ...$values
     * @return self
     */
    public function values (string ...$values): self {
        $this->values = array_merge($this->values, $values);
        return $this;
    }


    /**
     * Définit la date et l'heure du jour 
     *
     * @param string $datetime
     * @return self
     */
    public function datetime (string $datetime = "NOW()"): self {
        $this->datetime =  $datetime;
        return $this;
    }
    
   
    /**
     * Limit les nombres données à afficher 
     *
     * @param integer $limit
     * @return self
     */
    public function limit (int $limit = 100): self {
        $this->limit = $limit;
        return $this;
    }

    /**
     *
     * @param integer $offset
     * @return self
     */
    public function offset (int $offset = 0): self {
        $this->offset = $offset;
        return $this;
    }

    public function outerJoin (string ...$join): self {
        $this->outerJoin = array_merge($this->outerJoin, $join);
        return $this;
    }
    
    /**
     *
     * @param string ...$join
     * @return self
     */
    public function innerJoin (string ...$join): self {
        $this->innerJoin = array_merge($this->innerJoin, $join);
        return $this;
    }

    /**
     * Jointures de left
     * @param string ...$join
     * @return self
     */
    public function leftJoin (string ...$join): self {
        $this->leftJoin = array_merge($this->innerJoin, $join);
        return $this;
    }

 

    /**
     * Jointures de droit
     *
     * @param string ...$join
     * @return self
     */
    public function rightJoin (string ...$join): self {
        $this->rightJoin = array_merge($this->innerJoin, $join);
        return $this;
    }

    /**
     * Fait une recherche dans la base de données
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function like (string $key, string $value): self {
        $this->like[$key] = $value;
        return $this;
    }

    /**
     * Compte le nombre de ligne d'informations
     *
     * @param string $count
     * @return self
     */
    public function count (string $count = "id"): self {
        $this->count = $count;
        return $this;
    }

    /**
     * Execute les requetes 
     *
     * @param string $query
     * @return mixed
     */
    public function exec ($table = null) {

        $query = $this->__toString();

        if (!empty($this->params) && !empty($this->where) && !is_null($table)) {
            $req = $this->pdo->prepare($query);
            $req->execute($this->params);
            return $req->fetchAll(PDO::FETCH_CLASS, $table);
           
        } else {
            if (!is_null($this->count)) {
                return $this->pdo->query($query)->fetchAll(PDO::FETCH_NUM)[0];
            }
            return $this->pdo->query($query)->fetchAll(PDO::FETCH_CLASS, $table);
        }
    }

   



       /**
     * Le nom de la table 
     *
     * @param string $table
     * @param string $alias
     * @return self
     */
    public function from (string $table, ?string $alias = null): self {
        $this->from = $table;
        if ($alias) {
            $this->from = $table . " as " . $alias;
        }
        return $this;
    }

    /**
     * La requete avec la condition where
     *
     * @param string ...$where
     * @return self
     */
    public function where (string ...$where): self {
        $this->where = array_merge($this->where, $where);
        return $this;
    }

    /**
     * Les valeurs 
     *
     * @param array $params
     * @return self
     */
    public function params (array $params): self {
        $this->params = $params;
        return $this;
    }

    /**
     * formate les champs normal en champs nommé
     *
     * @param array $fields
     * @return string
     */
    public function formate (array $fields, $separator = false): string {
        $field = [];
        if ($separator) {
            foreach ($fields as $key) {
                $field[] = " $key = :$key ";
            }
        } else {
            foreach ($fields as $key) {
                $field[] = ":$key";
            }
        }
     
        return implode(", ", $field);
    }

    
    /**
     * Fait la requete select * from ...
     *
     * @param string[] ...$fields
     * @return self
     */
    public function fields (string ...$fields): self {
        $this->fields = array_merge($this->fields, $fields);
        return $this;
    }

    /**
     * get where
     *
     * @param array $where
     * @return string
     */
    private function getWhere (array $where): string {
        // where
        $query = ["WHERE"];
        $query[] = "(" . implode(") AND (", $where) . ")";
        return implode(" ", $query);
    }

    /**
     * Convertit un tableau en string 
     *
     * @return string
     */
    public function __toString(): string
    {
        $query = ['SELECT'];
    
        if (!empty($this->fields)) {
           $query[] = implode(", ", $this->fields);
        }   else {
            if ($this->count) {
                $query[] = "COUNT(" . $this->count . ")";
            } else {
                $query[] = "*";
            }
        }


        // la table 
        if (!empty($this->from)) {
            $query[] = "FROM";
            $query[] = $this->from;
        }

        // les jointures entre tables
        if (
            !empty($this->innerJoin) ||  !empty($this->leftJoin) ||
            !empty($this->outerJoin) ||  !empty($this->rightJoin)
        ) {
            if (!empty($this->innerJoin)) {
               $query[] = implode(" ", $this->innerJoin);
            }

            elseif (!empty($this->leftJoin)) {
                $query[] = implode(" ", $this->leftJoin);
            }

            elseif (!empty($this->rightJoin)) {
                $query[] = implode(" ", $this->rightJoin);
            }

            else {
                $query[] = implode(" ", $this->outerJoin);
            }
        }

        if (!empty($this->where)) {
            $query[] = $this->getWhere($this->where);
        }

        // order by
        if (!empty($this->by)) {
            $query[] = "ORDER BY ";
            $query[] = implode(",", $this->by);
        }

        // limit
        if (!is_null($this->limit)) {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }

        // offset
        if (!is_null($this->offset)) {
            $query[] = "OFFSET";
            $query[] = $this->offset;
        }

        return implode(" ", $query);
    }
}