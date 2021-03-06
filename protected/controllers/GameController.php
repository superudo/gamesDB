<?php
/**
 * Controller class for Games
 * @package Controllers
 */
class GameController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','test','subform'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','reqUpdateAuthor','reqUpdateArtist'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Game;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Game'])) {
			$model->attributes = $_POST['Game'];
			if (isset($_POST['Game']['categoryIds']))  {
				$model->categories = $_POST['Game']['categoryIds'];
			}

			if (isset($_POST['Game']['artistIds'])) {
				$model->artists = $_POST['Game']['artistIds'];
			}
			
			if (isset($_POST['Game']['authorIds'])) {
				$model->authors = $_POST['Game']['authorIds'];
			}
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionReqUpdateAuthor() {
		if ($_POST['isAjaxRequest'] == 1) {
			if (isset($_POST['new_author'])) {
				$author = new Author();
				$author->name = $_POST['new_author'];
				$author->url = "";
				$author->save();
				
				if (isset($_POST['id']) && is_integer($_POST['id'])) {
					$model = $this->loadModel($_POST['id']);
					$model->authors[] = $author;
				} else {
					$model = new Game();
					$model->authors = array($author);
				}
				
			}
			$this->renderPartial('_authors', array('model' => $model), false, true);
		}
		Yii::app()->end();
	}

	public function actionReqUpdateArtist() {
		if ($_POST['isAjaxRequest'] == 1) {
			if (isset($_POST['new_artist'])) {
				$artist = new Artist();
				$artist->name = $_POST['new_artist'];
				$artist->url = "";
				$artist->save();
				
				if (isset($_POST['id']) && is_integer($_POST['id'])) {
					$model = $this->loadModel($_POST['id']);
					$model->artists[] = $artist;
				} else {
					$model = new Game();
					$model->artists = array($artist);
				}
				
			}
			$this->renderPartial('_artists', array('model' => $model), false, true);
		}
		Yii::app()->end();
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Game']))
		{
			$model->attributes = $_POST['Game'];
			if (isset($_POST['Game']['categoryIds'])) {
				$model->categories = $_POST['Game']['categoryIds'];
			}
			else {
				$model->categories = array();
			}

			if (isset($_POST['Game']['artistIds'])) {
				$model->artists = $_POST['Game']['artistIds'];
			}
			else {
				$model->artists = array();
			}
			
			if (isset($_POST['Game']['authorIds'])) {
				$model->authors = $_POST['Game']['authorIds'];
			}
			else {
				$model->authors = array();
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			
			Yii::app()->user->setFlash('success', "Game deleted.");
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Game');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Game('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Game']))
			$model->attributes=$_GET['Game'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function actionSubform() {
		$form = new CForm('application.views.game.form');
		$form['game']->model = new Game;
		$form['author']->model = new Author;
		
		if ($form->submitted('save')) {
			$game = $form['game']->model;
			$author = $form['author']->model;
			$this->redirect('view');
		}
		
		if ($form->submitted('saveauthor')) {
			$this->redirect('author');
		}
		
		$this->render('subform', array('form' => $form));
		
	}
	/**
	 * Action for testing purposes
	 * @param integer $id
	 */
	public function actionTest($id) 
	{
		$model = $this->loadModel($id);

		if (isset($_POST['Game'])) {
			$model->attributes = $_POST['Game'];
			$model->categories = $_POST['Game']['categoryIds'];
			 
			if($model->save())
				$this->redirect(array('view', 'id' => $id));
		}

		$this->render('test', array(
			'model' => $model,
		));	
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Game::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='game-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Gets the name of a game identified by $id
	 * @param integer $id ID of the game to get the name for
	 * @return string Name of the game or empty string
	 */
	public function getName($id)
	{
		$game = $this->findByPk($id);
		return ($game)? $game->name: "";
	}
}
