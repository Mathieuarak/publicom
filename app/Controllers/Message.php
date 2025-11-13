<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Files\File;

class Message extends BaseController
{

    protected $helpers = ['form'];

    //liste des message
    public function liste($communeId)
    {
        $messageModel = model('MessageModel');
        $communeModel = model('Commune');

        $messageListe = $messageModel->where('ID_COMMUNEMESSAGE', $communeId)->findAll();

        return view('liste_messages', ['messageListe' => $messageListe, 'commune' => $communeModel->find($communeId), 'isAdmin' => true]);
    }

    //page de visualisation des message
    public function visualisation($messageId)
    {
        $messageModel = model('MessageModel');
        $communeModel = model('Commune');

        $message = $messageModel->find($messageId);
        $commune = $communeModel->find($message['ID_COMMUNEMESSAGE']);
        $file = $message['FOND'];

        return view('visu_message', ['message' => $message, 'commune' => $commune, 'isAdmin' => true, 'img' => $file]);
    }

    //création de message
    public function ajout($communeId)
    {
        $communeModel = model('Commune');

        return view('ajout_message', ['commune' => $communeModel->find($communeId), 'isAadmin' => true]);
    }
    public function create()
    {
        $messageModel = model('MessageModel');

        $data = [
            'ID_COMMUNEMESSAGE' => $this->request->getPost('idCommune'),
            'TITRE' => $this->request->getPost('titre'),
            'CONTENU' => $this->request->getPost('message'),
            'POLICETITRE' => $this->request->getPost('policeTitre'),
            'POLICECONTENU' => $this->request->getPost('policeTexte'),
            'ALIGNEMENT' => $this->request->getPost('alignement'),
            'FOND' => $this->request->getPost('fond'),
            'TAILLECONTENU' => $this->request->getPost('tailleTexte'),
            'TAILLETITRE' => $this->request->getPost('tailleTitre'),
            'ON_OFF'=> $this->request->getPost('on_off')

        ];

        $messageModel->insert($data);
        return redirect()->route('liste_messages', [$this->request->getPost('idCommune')]);
    }

    //modification des message
    public function modif($messageId)
    {
        $messageModel = model('MessageModel');
        $communeModel = model('Commune');

        $message = $messageModel->find($messageId);
        $commune = $communeModel->find($message['ID_COMMUNEMESSAGE']);

        return view('modif_message', ['message' => $message, 'commune' => $commune, 'isAdmin' => true]);
    }
    public function update()
    {
        
        $messageModel = model('MessageModel');
        $communeModel = model('Commune');

        $messageId=$this->request->getPost('idMessage');
        $message = $messageModel->find($messageId);
        $commune = $communeModel->find($message['ID_COMMUNEMESSAGE']);


        $validationRule = [
            'fond' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[fond]',
                    'is_image[fond]',
                    'mime_in[fond,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                ],
            ],
        ];
        if (! $this->validateData([], $validationRule)) {
            $error = $this->validator->getErrors();
            return view('modif_message', ['message' => $message, 'commune' => $commune, 'isAdmin' => true, 'errors' => $error]);
        }

        
        $img = $this->request->getFile('fond');
        
        delete_files(ROOTPATH.'public/'.$message['FOND']);
        $fileName = $img->getRandomName();
        $ext = $img->getClientExtension();
        $img->move(ROOTPATH.'public/uploads/',$fileName);
        $filepath='uploads/'.$fileName;
            

        $data = [
        'TITRE' => $this->request->getPost('titre'),
        'CONTENU' => $this->request->getPost('message'),
        'POLICETITRE' => $this->request->getPost('policeTitre'),
        'POLICECONTENU' => $this->request->getPost('policeTexte'),
        'ALIGNEMENT' => $this->request->getPost('alignement'),
        'TAILLECONTENU' => $this->request->getPost('tailleTexte'),
        'TAILLETITRE' => $this->request->getPost('tailleTitre'),
        'FOND' => new File($filepath),
        ];
        
        $messageModel->update($this->request->getPost('idMessage'), $data);
        return redirect()->route('liste_messages', [$this->request->getPost('idCommune')]);
    }

    public function visuModif()
    {
        $messageModel = model('MessageModel');

        $data = [
            'ON_OFF' => $this->request->getPost('on_off')
        ];

        $messageModel->update($this->request->getPost('idMessage'), $data);
        return redirect()->route('liste_messages', [$this->request->getPost('idCommune')]);
    }

    //suppresion des message
    public function delete()
    {
        $messageModel = model('MessageModel');
        $messageModel->delete($this->request->getPost('idMessage'));

        return redirect()->route('liste_messages', [$this->request->getPost('idCommune')]);
    }
}
