<?php
/**
 * GameContextController
 */
class GameContextController extends Controller 
{

	/**
	 * @var private property containing the associated Game model instance
	 */
	protected $_game = null;

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
	
}
    