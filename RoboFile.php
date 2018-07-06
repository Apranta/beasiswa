<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function push($commitMessage, $origin = "origin", $branch = "master")
    {
        $this->standardize();
        if ($this->test()->wasSuccessful())
        {
            $this->say("Pushing code to repository...");
            $this->taskGitStack()
                ->add('.')
                ->run();
            if ($this->commit($commitMessage)->wasSuccessful())
            {
                $this->taskGitStack()
                    ->push($origin, $branch)
                    ->run();
            }
            else
            {
                $this->say('VCS task stack failed');
            }
        }
        else
        {
            $this->say("Testing failed.");
        }
    }

    public function commit($commitMessage)
    {
        return $this->taskGitStack()
            ->commit($commitMessage)
            ->run();
    }

    public function standardize()
    {
        $this->say("Standardize coding style using PHP CodeSniffer...");
        return $this->_exec("phpcbf application/controllers application/models application/views application/core");
    }

    public function test()
    {
        $this->say("Testing application using Codeception...");
        return $this->_exec('"vendor\bin\codecept" run --steps');
    }
}