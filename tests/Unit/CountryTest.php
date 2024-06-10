<?php

namespace Tests\Unit;

use App\Models\Country;
use Tests\TestCase;

class CountryTest extends TestCase
{
    public function test_that_country_created(): void
    {
        $country = Country::factory()->create();

        $this->assertInstanceOf(Country::class, $country);
    }
}
