<?php

class GameXAwardController extends Controller
{
	/**
	 * @var private property containing the associated Game model instance
	 */
	private $_game = null;
	
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
			'gameContext - index, view, delete', // check to ensure valid game context
		);
	}

	protected function loadGame($game_id)
	{
		if ($this->_game === null) {
			$this->_game = Game::model()->findByPk($game_id);
			if ($this->_game === null) {
				throw new CHttpException(404, 'The requested game does not exist.');
			}
		}
		return $this->_game;
	}
	
	public function filterGameContext($filterChain)
	{
		$gameId = null;
		if (isset($_GET['gid'])) {
			$gameId = $_GET['gid'];
		}
		else {
			if (isset($_POST['gid'])) {
				$gameId = $_POST['gid'];
			}
		}
		$this->loadGame($gameId);
		
		$filterChain->run();
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
				'actions'=>array('index','view','list'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new GameXPrice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Award']))
		{
			$model->attributes=$_POST['Award'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id, 'gid' => $model->game_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'game'=>$this->_game,
		));
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

		if(isset($_POST['Award']))
		{
			$model->attributes=$_POST['Award'];
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
			$model = $this->loadModel($id);
			$gid = $model->game_id;
			 
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'), array('gid' => $gid));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GameXAward');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GameXPrice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Award']))
			$model->attributes=$_GET['Award'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionList()
	{
		$dataProvider = new CActiveDataProvider('GameXAward', array(
			'criteria' => array(
				'condition' => 'game_id = :gameId',
				'params' => array(':gameId' => $this->_game->id),
			),
			'pagination' => array(
				'pageSize' => 10,
			),
		));
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
			'game' => $this->_game,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GameXAward::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='game-xaward-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
