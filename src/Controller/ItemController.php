<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Form\Element\Email;
use Form\Element\Submit;
use Form\Element\Text;
use Form\Element\Textarea;
use Form\Form;
use Message\Message;
use Model\Item;
use Model\ItemManager;
use Validator\NotEmpty;
use Validator\StringLength;

/**
 * Class ItemController
 *
 */
class ItemController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function index()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->selectAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    /**
     * Display item informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

    /**
     * Display item edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit item with id $id
        return $this->twig->render('Item/edit.html.twig', ['item', $id]);
    }

    /**
     * Display item creation page
     *
     * @return string
     */
    public function add()
    {
        $errors = [];

        $name = new Text('name');
        $email = new Email('email');
        $description = new Textarea('description');
        $button = new Submit('btn_submit');

        $message = new Message();
        $message->setName('Nico');
        $message->setEmail('nico@gmail.com');
        $message->setDescription('une longue description');

        $form = new Form($message);
        $form->addElement($name);
        $form->addElement($email);
        $form->addElement($description);
        $form->addElement($button);
        $form->setAction('/item/add');

        // soumission du form
        if (!empty($_POST)) {
            $notEmpty = new NotEmpty($_POST['txt_name']);
            $strLength = new StringLength($_POST['txt_name'], 10);
            if (!$strLength->isValid() || !$notEmpty->isValid()) {
                $errors[] = $notEmpty->getErrors();
                $errors[] = $strLength->getErrors();
            } else {
                echo  'enregistrement en bdd';
            }
        }

        return $this->twig->render('Item/add.html.twig',
                                    ['form' => $form->render(),
                                        'errors' => $errors]);
    }

    /**
     * Display item delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the item with id $id
        return $this->twig->render('Item/index.html.twig');
    }
}
