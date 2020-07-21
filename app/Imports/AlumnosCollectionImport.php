<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlumnosCollectionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        dd($collection);
    	return $collection;
    	/*$cont = 0;
        foreach ($collection as $key) {
        	# code...
        	if($cont > 0){
        	   echo $key[0];
        	   $Enterprise = new Enterprise;
        	   $Enterprise->companyName = $key[0];
        	   $Enterprise->businessName = $key[1];
        	   $Enterprise->companyPhone = $key[2];
        	   $Enterprise->save();       	   
        	}
        	$cont++;
        }*/
    }
}
