<?php 

class Smart
{
	private $CONFIG;
	private $criteria;
	private $weights;
	private $data;

	public function __construct()
	{
		$this->CONFIG = json_decode(file_get_contents(APPPATH . '/libraries/Smart/config.json'), true);
		$this->criteria = $this->CONFIG['criteria'];
		$this->weights = array_column($this->criteria, 'weight');
	}

	public function fit($data)
	{
		$this->data = $data;
	}

	public function result()
	{
		$result = 0;
		foreach ($this->criteria as $criterion)
		{
			$value = $this->data[$criterion['name']];
			$normalizedWeight = $this->normalize($criterion['weight']);

			if ($criterion['type'] == 'range')
			{
				foreach ($criterion['rules'] as $rule)
				{
					if (isset($rule['max'], $rule['min']))
					{
						if ($value >= $rule['min'] && $value <= $rule['max'])
						{
							$result += $rule['value'] * $normalizedWeight;
						}
					}
					elseif (!isset($rule['max']))
					{
						if ($value >= $rule['min'])
						{
							$result += $rule['value'] * $normalizedWeight;
						}
					}
					elseif (!isset($rule['min']))
					{
						if ($value <= $rule['max'])
						{
							$result += $rule['value'] * $normalizedWeight;
						}
					}
				}
			}
			elseif ($criterion['type'] == 'pair')
			{
				$result += $criterion['rules'][$value] * $normalizedWeight;
			}
		}

		return $result;
	}

	private function normalize($criterion)
	{
		return $criterion / array_sum($this->weights);
	}
}