<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table            = 'CATEGORIE';
    protected $primaryKey       = 'IDCATEGORIE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NOM', 'DESCRIPTION'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules = [
        'NOM' => 'required|min_length[3]|max_length[32]',
        'DESCRIPTION' => 'permit_empty|max_length[255]'
    ];

    // Méthode pour obtenir les messages d'une catégorie
    public function getMessages($categorieId)
    {
        $messageModel = model('MessageModel');
        return $messageModel->where('ID_CATEGORIEMESSAGE', $categorieId)->findAll();
    }
}