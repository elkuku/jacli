<?php
/**
 * User: elkuku
 * Date: 05.05.12
 * Time: 21:58
 */

class AcliApplicationInterfaceWordpress extends AcliApplicationInterface
{
	public function createAdminUser(AcliModelDatabase $db)
	{
		// TODO: Implement createAdminUser() method.
	}

	public function createConfig()
	{
		// TODO: Implement createConfig() method.
	}

	public function cleanup()
	{
		// TODO: Implement cleanup() method.
	}

	public function setupDatabase()
	{
		// TODO: Implement setupDatabase() method.

		$installSql = $this->sourceDir . '/installation/sql/mysql/joomla.sql';

		if (0)//!file_exists($installSql))
			throw new Exception(__METHOD__.' - Install SQL file not found in ' . $installSql, 1);

		$this->config->set('site_name', 'TEST ' . $this->config->get('target'));
		$this->config->set('db_name', $this->config->get('target'));

		$dbModel = new AcliModelDatabase($this->config);

		$this->out(sprintf('Creating database %s ...', $this->config->get('db_name')), false);
		$dbModel->createDB();
		$this->out('ok');

		$this->out('Populating database...', false);
		//$dbModel->populateDatabase($installSql);
		$this->out('ok');

		$this->out('Creating admin user...', false);
		$this->createAdminUser($dbModel);
		$this->out('ok');

	}

	public function getBrowserLinks()
	{
		// TODO: Implement getBrowserLinks() method.
		return array('Wordpress site' => '');
	}

	/**
	 * Displays a result message.
	 *
	 * @return AcliApplicationInterface
	 */
	public function displayResult()
	{
		// TODO: Implement displayResult() method.
	}
}
