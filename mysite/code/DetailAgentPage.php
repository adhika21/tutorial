<?php

class DetailAgentPage extends Page {
}
class DetailAgentPage_Controller extends Page_Controller {

    private static $allowed_actions = array('index', 'show');

    public function index(SS_HTTPRequest $request) {
        $agents = AgentData::get();

        if ($search = $request->getVar('Nama Agent')) {
            $agents = $agents->filter([
                'Name:PartialMatch' => $search
            ]);
        }

        $paginatedAgents = PaginatedList::create(
            $agents,
            $request
        )->setPageLength(15)
         ->setPaginationGetVar('s');

        $data = [
            'Results' => $paginatedAgents
        ];

        if ($request->isAjax()) {
            return $this->customise($data)
                        ->renderWith('AgentSearchResults');
        }

        return $this->customise($data)->renderWith(array('DetailAgentPage', 'Page'));
    }

public function show(SS_HTTPRequest $request) {
    $urlSegment = $request->param('ID'); // Ambil URLSegment dari URL
    $agent = AgentData::get()->filter('URLSegment', $urlSegment)->first(); // Gunakan URLSegment untuk mencari agen

    if (!$agent) {
        return $this->httpError(404, 'That agent could not be found');
    }

    // Ambil properti yang dimiliki agen
    $properties = PropertyData::get()->filter('AgentID', $agent->ID);

    return $this->customise(array(
        'Agent' => $agent,
        'Properties' => $properties
    ))->renderWith(array('DetailAgentProperty', 'Page'));
}


    public function AgentSearchForm() {
        $form = Form::create(
            $this,
            'AgentSearchForm',
            FieldList::create(
                TextField::create('Nama Agent')
                    ->setAttribute('placeholder', 'Enter agent name...')
                    ->addExtraClass('form-control')
            ),
            FieldList::create(
                FormAction::create('index', 'Search')
                    ->addExtraClass('btn-lg btn-fullcolor')
            )
        );

        $form->setFormMethod('GET')
             ->setFormAction($this->Link())
             ->disableSecurityToken()
             ->loadDataFrom($this->request->getVars());

        return $form;
    }
}
