<?php   

class ModeloPokemon{

    private $host;
	private $dbName;
	private $user;
	private $pass;
	public $conection;

    public function __construct(){
        $this->host = constant('DB_HOST');
		$this->user = constant('DB_USER');
		$this->pass = constant('DB_PASS');
		$this->dbName = constant('DB_NAME');
        
		try {
            $opts = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
            $this->conection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.'', $this->user, $this->pass, $opts);
            $this->conection ->exec('set names utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
    
    // Obtener el listado de pokemons
    public function getAllPokemons(){
        $resultado = $this->conection->query('SELECT pokemons.id_pokemon, pokemons.nombre, tipos.nombre
        AS tipo, pokemons.url_imagen
        FROM pokemons
        INNER JOIN tipos ON
         pokemons.tipo = tipos.id_tipo');

		return $resultado;
    }

    /**
     * Hace una consulta para obtener los datos de solo un pokemon
     * @id Se le pasa el id del pokemon que se quieren consultar los datos
     */
    public function getDatosPokemon($id){
        $resultadoConsulta = $this->conection->query('SELECT pokemons.nombre AS pok_nombre,
        pokemons.descripcion AS pok_descrip,
        tipos.nombre AS tipo_nombre,
        pokemons.url_imagen AS pok_imagen,
        pokemons.id_pokemon AS pok_id FROM pokemons, tipos WHERE pokemons.tipo = tipos.id_tipo')->fetchAll();

        return $resultadoConsulta[$id];
    }

	/* Delete note by id */
	public function delete($id){
		$query = "DELETE FROM pokemons WHERE id_pokemon = $id";
		$this->conection->query($query);
	}
}

