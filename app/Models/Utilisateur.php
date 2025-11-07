<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["ID_UTILISATEURCOMMUNE","NOM","PRENOM","IDENTIFIANT","MOTDEPASSE"];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function isUser($login,$password){
        return $this 
        ->select("ID_UTILISATEURCOMMUNE")
        ->where("IDENTIFIANT", $login)
        ->where("MOTDEPASSE", $password)
        ->findAll();
    }
    public function usersInCommune($idCommune){
        return $this
        ->select("ID,NOM,PRENOM")
        ->where("ID_UTILISATEURCOMMUNE",$idCommune)
        ->findAll();
    }
    public function user($idUser){
        return $this
        ->select("utilisateur.ID,commune.NOM as nomCommune,utilisateur.PRENOM,utilisateur.IDENTIFIANT,utilisateur.NOM")
        ->join("commune",'commune.ID =utilisateur.ID_UTILISATEURCOMMUNE')
        ->where("utilisateur.ID",$idUser)
        ->findAll();
    }
}
