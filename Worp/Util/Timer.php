<?php
/**
 * Created by PhpStorm.
 * User: svhu
 * Date: 01.09.15
 * Time: 15:12
 */

namespace Worp\Util;

/**
 * Class Timer
 *
 * A timer object that can be instantiated, started and stopped and will tell
 * the duration for which it has been running.
 *
 * Instantiate the timer, start and stop it or reset it and let it tell you the duration.
 *
 * @package Worp\Util
 */
class Timer
{
	protected $requestStartTime;
	protected $requestEndTime;

	public function __construct()
	{
		$this->requestStartTime = null;
		$this->requestEndTime = null;
	}

	/**
	 * Starts the timer object
	 */
	public function startTimer()
	{
		$this->requestStartTime = microtime(true);
		$this->requestEndTime = null;
	}

	/**
	 * Stops the timer object
	 */
	public function stopTimer()
	{
		$this->requestEndTime = microtime(true);
	}

	/**
	 * Will tell the time difference in seconds between starting and stopping the timer.
	 *
	 * @return The difference between the time at starting point and the time at stopping point
	 * @throws \Exception
	 */
	public function getTimerDuration()
	{
		if ($this->requestStartTime != null && $this->requestEndTime != null)
			return $this->requestEndTime - $this->requestStartTime;
		else
			throw new \Exception('Start or end time not correctly set! Start time: ' . $this->requestStartTime . ' - End time: ' . $this->requestEndTime);
	}

	/**
	 * Reset the timer to 0
	 */
	public function resetTimer()
	{
		$this->requestEndTime = null;
		$this->requestStartTime = null;
	}
}
