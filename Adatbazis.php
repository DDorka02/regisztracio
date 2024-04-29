<?php
	class User{
		private $host="localhost";
		private $felhasznalonev="root";
		private $jelszo="";
		private $abNev="pizzahot";
		private $kapcsolat;
    
		public function __construct() {	
			$this->kapcsolat = new mysqli(
                $this->host,
                $this->felhasznalonev,
                $this->jelszo,
                $this->abNev
            );
			if ($this->kapcsolat->connect_error) {
				$szoveg="Sikertelen kapcs";
			}
			else
			$szoveg ="sikeres";
		$this->kapcsolat->query("SET NAMES UTF8");
		}

		public function reg_felhasznalo($nev, $email, $jelszo){
			$jelszo = md5($jelszo);
			$select1 = "SELECT * FROM felhasznalo WHERE nev='$nev' or email='$email'";

			//jelszó titkosítása
			//lekérdezem a felhasznalo adatai alapján, létezik-e már?
			//ha nem, felveszem/beszúrom a táblába az adatait; szerkesztő lesz alapból, és a bejelentkezett mező 0
				//visszatérek a lekérdezés eredményével (sikerült-e beszúrni)
			//különben hamis
		}

		
		public function bejelentkezes($emailNev, $jelszo){
			//jelszó titkosítása
			//lekérdezés: email vagy nev a megadott érték
			//ha már létezik, 
				//állítsuk be a login kulcsot a sessionben igazra,
				//hozzuk létre a felhAzon kulcsú sessiont,
					//segítség:  $result->fetch_array(MYSQLI_ASSOC);
				//módosítsuk a bejelentkezést 1-re! térjünk vissza igazzal!
			//különben hamissal térjünk vissza!
    	}

    	
    	public function get_nev($felhAzon){
			$select3="SELECT nev FROM felhasznalo WHERE felhAzon= $felhAzon";
			$result = $this->lekerdezes($select3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['nev'];
    	}
		
		public function adminE($felhAzon){
			$select3 = "SELECT j.nev From jogosultsag as j inner join felhasznalo as f where j.jogAzon= f.jogAzon and felhAzon = $felhAzon and j.nev= 'admin'";
			$result = $this ->lekerdezes($select3)->num_rows;
			if ($result == 1){return true;}
			return false;
    		
    	}

	    public function kijelentkezes() {
			$felhAzon = $_SESSION['felhAzon'];
			$update2 = "UPDATE felhasznalo SET bejelenkezett = 0 WHERE felhAzon= $felhAzon";
			$result = $this->lekerdezes($update2);
			$_SESSION['login'] = FALSE;
			session_destroy();
	    }
		
		public function aktivok(){
			//lekérdezés
		}
		
		public function megjelenit_aktivok($matrix){
			//listázza az eredményt
		}

		public function kapcsolatBezar(){
			$this->kapcsolat->close();
		}

		public function get_session(){
			return $_SESSION['login'];
		}

	}
?>