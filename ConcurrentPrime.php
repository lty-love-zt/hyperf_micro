<?php
class PrimeGenerator
{
    public function generate()
    {
        for ($i=2;;$i++) {
            yield $i;
        }
    }
}

class PrimeFilter
{
    private int $prime;
    private Generator $src;
    private Generator $dst;

    public function __construct(Generator $src, int $prime) {
        $this->src = $src;
        $this->prime = $prime;
        $this->dst = $this->filter();
    }

    public function getDst(): Generator
    {
        return $this->dst;
    }

    private function filter(): Generator
    {
        foreach ($this->src as $num) {
            if ($num % $this->prime !== 0) {
                yield $num;
            }
        }
    }
}

function sieve(): void
{
    $gen = new PrimeGenerator();
    $ch = $gen->generate();

    for ($i=0; $i< 10; $i++) {
        $prime = $ch->current();
        echo $prime . ' ';
        $ch1 = (new PrimeFilter($ch, $prime))->getDst();
        $ch = $ch1;
    }
}

sieve();