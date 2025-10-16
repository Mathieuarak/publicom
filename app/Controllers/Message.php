<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Message extends BaseController
{

    //liste des message
    public function liste($communeId)
    {
        $messageModel=model('MessageModel');
        $communeModel=model('Commune');

        $messageListe=$messageModel->where('ID_COMMUNEMESSAGE', $communeId)->findAll();

        return view('liste_messages',['messageListe' =>$messageListe, 'commune' =>$communeModel->find($communeId),'isAdmin'=>true]);
    }

    //page de visualisation des message
    public function visualisation($messageId)
    {
        $messageModel=model('MessageModel');
        $communeModel=model('Commune');

        $message=$messageModel->find($messageId);
        $commune=$communeModel->find($message['ID_COMMUNEMESSAGE']);

        return view('visu_message',['message' =>$message, 'commune'=>$commune, 'isAdmin'=>true]);
    }

    //création de message
    public function ajout($communeId)
    {
        $communeModel=model('Commune');

        return view('ajout_message',['commune' =>$communeModel->find($communeId), 'isAadmin'=>true]);
    }
    public function create()
    {
        $messageModel=model('MessageModel');

        $data = [
            'ID_COMMUNEMESSAGE' => $this->request->getPost('idCommune'),
            'TITRE' => $this->request->getPost('titre'),
            'CONTENU' => $this->request->getPost('message'),
            'POLICETITRE' => $this->request->getPost('policeTitre'),
            'POLICECONTENU' => $this->request->getPost('policeTexte'),
            'ALIGNEMENT' => $this->request->getPost('alignement'),
            'FOND' => $this->request->getPost('fond'),
            'TAILLECONTENU' =>$this->request->getPost('tailleTexte'),
            'TAILLE TITRE' =>$this->request->getPost('tailleTitre'),
            
        ];

        $messageModel->insert($data);
        return redirect()->route('liste_messages',[$this->request->getPost('idCommune')]);

    }

    //modification des message
        public function modif($messageId)
    {
        $messageModel=model('MessageModel');
        $communeModel=model('Commune');

        $message=$messageModel->find($messageId);
        $commune=$communeModel->find($message['ID_COMMUNEMESSAGE']);

        return view('modif_message',['message' =>$message,'commune'=>$commune, 'isAdmin'=>true]);
    }
    public function update()
    {
        $messageModel=model('MessageModel');

        $data = [
            'TITRE' => $this->request->getPost('titre'),
            'CONTENU' => $this->request->getPost('message'),
            'POLICETITRE' => $this->request->getPost('policeTitre'),
            'POLICECONTENU' => $this->request->getPost('policeTexte'),
            'ALIGNEMENT' => $this->request->getPost('alignement'),
            'FOND' => $this->request->getPost('fond'),
            'TAILLECONTENU' =>$this->request->getPost('tailleTexte'),
            'TAILLE TITRE' =>$this->request->getPost('tailleTitre'),
        ];

        $messageModel->update($this->request->getPost('idMessage'), $data);
        return redirect()->route('liste_messages',[$this->request->getPost('idCommune')]);
        
    }

    //suppresion des message
    public function delete()
    {
        $messageModel=model('MessageModel');
        $messageModel->delete($this->request->getPost('idMessage'));
        
        return redirect()->route('liste_messages',[$this->request->getPost('idCommune')]);
    }

}
