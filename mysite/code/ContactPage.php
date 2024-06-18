<?php

class ContactPage extends Page {
    // You can add custom page fields here
}

class ContactPage_Controller extends Page_Controller {

    private static $allowed_actions = [
        'ContactForm'
    ];

    public function ContactForm() {
        $fields = new FieldList(
            TextField::create('Name', 'Your Name'),
            EmailField::create('Email', 'Your Email'),
            TextareaField::create('Message', 'Your Message')
        );

        $actions = new FieldList(
            FormAction::create('SubmitContactForm', 'Submit')
        );

        $validator = new RequiredFields('Name', 'Email', 'Message');

        return new Form($this, 'ContactForm', $fields, $actions, $validator);
    }

    public function SubmitContactForm($data, $form) {
        $submission = ContactFormSubmissionData::create();
        $form->saveInto($submission);
        $submission->write();

        $form->sessionMessage('Thank you for your message!', 'good');

        return $this->redirectBack();
    }
}
