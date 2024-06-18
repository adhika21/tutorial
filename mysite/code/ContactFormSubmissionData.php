<?php

class ContactFormSubmissionData extends DataObject {
    private static $db = [
        'Name' => 'Varchar',
        'Email' => 'Varchar',
        'Message' => 'Text'
    ];

    private static $summary_fields = [
        'Name' => 'Name',
        'Email' => 'Email',
        'Message' => 'Message'
    ];
}
