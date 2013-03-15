<?php

return array(
	'elements' => array(
		'game' => array(
			'type' => 'form',
			'title' => 'Game',
			'elements' => array(
				'name' => array(
					'type' => 'text',
				)
			)
		),
		'author' => array(
			'type' => 'form',
			'title' => 'Autor',
			'elements' => array(
				'name' => array(
					'type' => 'text',
				),
				'url' => array(
					'type' => 'text',
				)
			),
			'buttons' => array(
				'saveauthor' => array(
					'type' => 'submit',
					'label' => 'Autor speichern'
				)
			)
		),
	),
	'buttons' => array(
		'save' => array(
			'type' => 'submit',
			'label' => 'Und ab dafür...'
		)
	)
);