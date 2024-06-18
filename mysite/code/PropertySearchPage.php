<?php

class PropertySearchPage extends Page {
}

class PropertySearchPage_Controller extends Page_Controller {

    private static $allowed_actions = array('index', 'show');

    public function index(SS_HTTPRequest $request) {
        $properties = PropertyData::get();
		

        if ($search = $request->getVar('Title')) {
            $properties = $properties->filter([
                'Title:PartialMatch' => $search
            ]);
        }
		
        if ($search = $request->getVar('Alamat')) {
            $properties = $properties->filter([
                'Alamat:PartialMatch' => $search
            ]);
        }		

        if ($search = $request->getVar('Group')) {
            $properties = $properties->filter([
                'Group:PartialMatch' => $search
            ]);
        }	

        if ($search = $request->getVar('Transaksi')) {
            $properties = $properties->filter([
                'Transaksi:PartialMatch' => $search
            ]);
        }

        if ($search = $request->getVar('Tipe')) {
            $properties = $properties->filter([
                'PropertyType.Title:PartialMatch' => $search
            ]);
        }			
		
        if ($search = $request->getVar('Fasilitas')) {
            $properties = $properties->filter([
                'Property.Facilities.Fasilitas:PartialMatch' => $search
            ]);
        }			

        // Perubahan dimulai di sini
        if ($arrival = $request->getVar('ArrivalDate')) {
            $arrivalStamp = strtotime($arrival);
            $nightAdder = '+' . $request->getVar('Nights') . ' days';
            $startDate = date('Y-m-d', $arrivalStamp);
            $endDate = date('Y-m-d', strtotime($nightAdder, $arrivalStamp));

            $properties = $properties->filter([
                'AvailableStart:LessThanOrEqual' => $startDate,
                'AvailableEnd:GreaterThanOrEqual' => $endDate
            ]);
        }

        if ($bedrooms = $request->getVar('Bedrooms')) {
            $properties = $properties->filter([
                'Bedrooms:GreaterThanOrEqual' => $bedrooms
            ]);
        }

        if ($bathrooms = $request->getVar('Bathrooms')) {
            $properties = $properties->filter([
                'Bathrooms:GreaterThanOrEqual' => $bathrooms
            ]);
        }

        if ($minPrice = $request->getVar('MinPrice')) {
            $properties = $properties->filter([
                'PricePerNight:GreaterThanOrEqual' => $minPrice
            ]);
        }

        if ($maxPrice = $request->getVar('MaxPrice')) {
            $properties = $properties->filter([
                'PricePerNight:LessThanOrEqual' => $maxPrice
            ]);
        }

        $paginatedProperties = PaginatedList::create(
            $properties,
            $request
        )->setPageLength(15)
         ->setPaginationGetVar('s');

        $data = [
            'Results' => $paginatedProperties
        ];

        if ($request->isAjax()) {
            return $this->customise($data)
                        ->renderWith('PropertySearchResults');
        }

        return $this->customise($data)->renderWith(array('PropertySearchPage', 'Page'));
    }

    public function show(SS_HTTPRequest $request) {
        $propertyURLSegment = $request->param('ID'); // Ambil URLSegment dari URL
        $property = PropertyData::get()->filter('URLSegment', $propertyURLSegment)->first(); // Gunakan URLSegment untuk mencari properti
		
        if (!$property) {
            return $this->httpError(404, 'That property could not be found');
        }

        return $this->customise(array(
            'Property' => $property
        ))->renderWith(array('DetailProperty', 'Page'));
    }

    public function PropertySearchForm() {
        $nights = [];
        foreach (range(1, 14) as $i) {
            $nights[$i] = "$i night" . (($i > 1) ? 's' : '');
        }

        $prices = [];
        foreach (range(100, 1000, 50) as $i) {
            $prices[$i] = '$' . $i;
        }

        $form = Form::create(
            $this,
            'PropertySearchForm',
            FieldList::create(
                TextField::create('Title')
                    ->setAttribute('placeholder', 'City, State, Country, etc...')
                    ->addExtraClass('form-control'),
                TextField::create('Alamat')
                    ->setAttribute('placeholder', 'Masukkan Alamat')
                    ->addExtraClass('form-control'),
                 DropdownField::create('Group')
                    ->setEmptyString('-- any --')
					->setSource(ArrayLib::valuekey(['New', 'Secondary']))  
                    ->addExtraClass('form-control'),
                 DropdownField::create('Transaksi')
                    ->setEmptyString('-- any --')
					->setSource(ArrayLib::valuekey(['Jual', 'Sewa']))  
                    ->addExtraClass('form-control'),
				DropdownField::create('Tipe')
					->setEmptyString('-- any --')
					->setSource(MasterPropertyData::get()->map('Title')->toArray())
					->addExtraClass('form-control'),
				ListboxField::create('Fasilitas')
					->setMultiple(true)
					->setSource(FasilitasPropertyData::get()->map('Fasilitas', 'Fasilitas')->toArray())
					->setEmptyString('-- any --')
					->addExtraClass('form-control'),				
                DropdownField::create('Bedrooms')
					->setEmptyString('-- any --')
                    ->setSource(ArrayLib::valuekey(range(1, 7)))                    
                    ->addExtraClass('form-control'),
                DropdownField::create('Bathrooms')
					->setEmptyString('-- any --')
                    ->setSource(ArrayLib::valuekey(range(1, 7)))
                    ->addExtraClass('form-control')
            ),
            FieldList::create(
                FormAction::create('doPropertySearch', 'Search')
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
