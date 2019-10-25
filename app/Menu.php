<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['id','restoran_id','gambar','nama_makanan','harga_maknanan','kalori','protein','karbohidrat','lemak'];


    public function getAvatar()
      {
         if (!$this->gambar) {
            return asset('images/default.png');
         }
         return asset('images/'.$this->gambar);
      }
      public function getKalori()
   	{
   		if (empty($this->kalori)) {
   			return '-';
   		}return $this->kalori;
   	}
   	public function getProtein()
   	{
   		if (empty($this->protein)) {
   			return '-';
   		}return $this->protein;
   	}
   	public function getLemak()
   	{
   		if (empty($this->lemak)) {
   			return '-';
   		}return $this->lemak;
   	}
   	public function getKarbohidrat()
   	{
   		if (empty($this->karbohidrat)) {
   			return '-';
   		}return $this->karbohidrat;
   	}
}
