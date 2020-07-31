<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficialDocument extends Model
{
		use SoftDeletes;
        protected $table="official_documents";
        protected $primaryKey = "oficialDocument_id";
        //protected $fillable = ['companyName','businessName','companyPhone'];
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];

        public function advisor(){
        	return $this->hasOne('App\admin\vinculacion\seguimiento\AcademicAdvisor','academicAdvisor_id','academicAdvisor_id');
        }

        public function editor(){
        	return $this->hasOne('App\admin\vinculacion\seguimiento\EditorStyle','editorialAdvisor_id','editorialAdvisor_id');
        }

        public function link(){
			return $this->hasOne('App\admin\vinculacion\seguimiento\ResponsibleLinking','responsibleLinking_id','responsibleLinking_id');
        }

        public function director(){
			return $this->hasOne('App\admin\vinculacion\seguimiento\AcademicDirector','academicDirector_id','academicDirector_id');
        }
}
