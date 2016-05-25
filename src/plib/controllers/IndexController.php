<?php

class IndexController extends pm_Controller_Action
{
    public function init()
    {
        parent::init();

        $this->view->pageTitle = $this->lmsg('pageTitle');
        $this->view->tabs = [
            [
                'title' => $this->lmsg('tabs.domains'),
                'action' => 'domain-list',
            ],
            [
                'title' => $this->lmsg('tabs.wordpress'),
                'action' => 'wordpress-list',
            ],
            [
                'title' => $this->lmsg('tabs.settings'),
                'action' => 'settings',
            ],
        ];
    }

    public function indexAction()
    {
        $this->_forward('domain-list');
    }

    public function domainListAction()
    {
        $this->view->list = $this->_getDomainsList();
    }

    public function domainListDataAction()
    {
        $this->_helper->json($this->_getDomainsList()->fetchData());
    }

    private function _getDomainsList()
    {
        $list = new Modules_SecurityWizard_View_List_Domains($this->view, $this->_request);
        $list->setDataUrl(['action' => 'domain-list-data']);
        return $list;
    }


    public function wordpressListAction()
    {
    }

    public function settingsAction()
    {
    }
}
