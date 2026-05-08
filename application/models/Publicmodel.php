<?php 
class Publicmodel extends CI_Model
{
	public function getalldata($table)
	{
		$query = $this->db->select("*")->where('status', "Active")->get($table);
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else{
			return FALSE;
		}
	}

	public function productlist($id, $column, $table, $ord='id', $condition='')
	{
		if($id>0){
			$sliderdata	= $this->db->select('*')
				->where(array($column=>$id, 'status'=>'Active'))
				->get($table);
				return $sliderdata->row();
		} else{
			$this->db->order_by($ord, 'ASC');
			if($condition!=''){
				$breakCond = explode('=', $condition);
				$sliderlist = $this->db->get_where($table, array('status'=>'Active', $breakCond[0]=>$breakCond[1]));
			} else{
				$sliderlist = $this->db->get_where($table, array('status'=>'Active'));
			}
			return $sliderlist->result();
		}
	}

	public function singledetail($id, $column, $table)
	{
		$singledata	= $this->db->select('*')->where($column, $id)->get($table);
		if($singledata->num_rows()>0){
			return $singledata->row();
		}  else {
			return false;
		}
	}

	public function getloopdata($id, $column, $table, $ord='', $limit=0, $offset=0)
	{
		if($ord!=''){
			$this->db->order_by($ord, 'ASC');
		}
		$this->db->select('*')->where(array($column=>$id, 'status'=>'Active'));
		if($limit > 0){
			$this->db->limit($limit, $offset);
		}
		$loopdata = $this->db->get($table);
		return $loopdata->result();
	}

	public function allmetacontent($url)
	{
		$checkUrl = $this->db->get_where('tbl_seo_url', array('url'=>$url));
		if($checkUrl->num_rows()) {
			return $checkUrl->row();
		} else 	{
			$checkUrl = $this->db->get_where('tbl_seo_url', array('id'=>1));
			return $checkUrl->row();
		}
	}

	public function youtubeVideo(){
		$this->db->order_by('id', 'RANDOM');
		$query = $this->db->select('*')->limit(1)->get('tbl_testimonial');
		if($query->num_rows() > 0 ) {
			$result = $query->result_array();
			return $result;
		}
		return false;
	}

	// public function getBlogDetailBySlug($page_url)
    // {
    //     // Fetch the blog detail based on the slug
    //     $this->db->select('*');
    //     $this->db->from('tbl_blog'); // Assuming your table name is tbl_blog
    //     $this->db->where('page_url', $page_url); // Filter by slug
    //     $query = $this->db->get();

    //     // Return the result as an array or null if not found
    //     if ($query->num_rows() > 0) {
    //         return $query->row_array(); // Returns a single row as an associative array
    //     } else {
    //         return null; // No blog found with the given slug
    //     }
    // }

	
}
?>