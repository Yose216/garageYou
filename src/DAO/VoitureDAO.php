<?php

namespace garage\DAO;

use garage\Domain\Voiture;

class VoitureDAO extends DAO
{
    /**
     * Return a list of all voitures, sorted by date (most recent first).
     *
     * @return array A list of all voitures.
     */
     public function findAll() {
         $sql = "select * from voiture order by vtr_id desc";
         $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
         $articles = array();
         foreach ($result as $row) {
             $articleId = $row['vtr_id'];
             $articles[$articleId] = $this->buildDomainObject($row);
         }
         return $articles;
     }

    /**
     * Creates an Voiture object based on a DB row.
     *
     * @param array $row The DB row containing Voiture data.
     * @return \garage\Domain\Voiture
     */
     protected function buildDomainObject($row) {
         $voiture = new Voiture();
         $voiture->setId($row['vtr_id']);
         $voiture->setModel($row['vtr_model']);
         $voiture->setMarque($row['vtr_marque']);
		 $voiture->setAnnee($row['vtr_annee']);
		 $voiture->setKilometrage($row['vtr_kilometrage']);
         $voiture->setCarburant($row['vtr_carburant']);
         $voiture->setBoiteVitesse($row['vtr_boite']);
         return $voiture;
     }
	
	 public function find($id) {
         $sql = "select * from voiture where vtr_id=?";
         $row = $this->getDb()->fetchAssoc($sql, array($id));

         if ($row)
             return $this->buildDomainObject($row);
         else
             throw new \Exception("No voiture matching id " . $id);
     }
	
	 /**
     * Saves an voiture into the database.
     *
     * @param \garage\Domain\Article $article The voiture to save
     */
     public function save(Voiture $voiture) {
		
         $voitureData = array(
             'vtr_model' => $voiture->getModel(),
             'vtr_marque' => $voiture->getMarque(),
			 'vtr_annee' => $voiture->getAnnee(),
			 'vtr_kilometrage' => $voiture->getKilometrage(),
             'vtr_carburant' => $voiture->getCarburant(),
             'vtr_boite' => $voiture->getBoiteVitesse(),
             );

         if ($voiture->getId()) {
            // The voiture has already been saved : update it
             $this->getDb()->update('voiture', $voitureData, array('vtr_id' => $voiture->getId()));
         } else {
            // The voiture has never been saved : insert it
             $this->getDb()->insert('voiture', $voitureData);
            // Get the id of the newly created voiture and set it on the entity.
             $id = $this->getDb()->lastInsertId();
             $voiture->setId($id);
         }
     }

    /**
     * Removes an voiture from the database.
     *
     * @param integer $id The voiture id.
     */
    public function delete($id) {
        // Delete the voiture
         $this->getDb()->delete('voiture', array('vtr_id' => $id));
     }

}