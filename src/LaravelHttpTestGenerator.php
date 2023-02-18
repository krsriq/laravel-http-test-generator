<?php

namespace Krsriq\LaravelHttpTestGenerator;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;

use function base_path;
use function file_put_contents;
use function time;
use function var_export;

class LaravelHttpTestGenerator
{
    private string $className;
    /**
     * @var Request[]
     */
    private array $calls = [];
    private bool $enabled = false;

    public function __construct()
    {
        $this->className = 'HttpTest'.time();
    }

    public function enable(): void
    {
        $this->enabled = true;
    }

    public function addCall(Request $request, Response $response): void
    {
        if (! $this->enabled) {
            return;
        }

        $this->calls[] = ['request' => $request, 'response' => $response];
    }

    public function save(): void
    {
        if (! $this->enabled) {
            return;
        }

        if (empty($this->calls)) {
            return;
        }

        $this->saveTest($this->generateTest(), $this->generatePath());
    }

    private function generateTest(): string
    {
        $test = <<<EOD
        <?php
        namespace Tests\Feature;
        use Tests\TestCase;
        use Illuminate\Support\Facades\Http;
        class $this->className extends TestCase
        {
            /** @test **/
            public function it_can_run()
            {
                Http::preventStrayRequests();
                Http::fake(array(
        EOD;

        foreach ($this->calls as $call) {
            $test .= "'".$call['request']->url().'\' => Http::response('.
                var_export($call['response']->json(), true).', '.$call['response']->status().'),';
        }

        $test .= <<<'EOD'
                ));

                // TODO: add test code here
                }
            }
        EOD;

        return $test;
    }

    private function generatePath(): string
    {
        return base_path("tests/Feature/{$this->className}.php");
    }

    private function saveTest($test, string $path): void
    {
        file_put_contents($path, $test);
    }
}
