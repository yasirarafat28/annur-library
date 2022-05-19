<div class="namaz_schedule" style="font-size: 12px; font-family: tahoma;">
	<h3 style="text-align:center;background-color: #895621;padding: 6px 8px 6px 8px;color: #fff;" >নামাজের সময়সূচী </h3>
	<table style="width: 100%;border: 1px solid #ddd;">
		<?php 
			
			$this->db->select('*');
			$this->db->from('namaz'); 
			$this->db->order_by('namaz_id','asc');        
			$query = $this->db->get(); 
			$namaz_schedule= $query->result_array();
			
			
			$this->db->select('*');
			$this->db->from('category'); 
			$this->db->order_by('category_id','asc');        
			$query = $this->db->get(); 
			$categories= $query->result_array();
			foreach($namaz_schedule as $namaz): 
		?>
		<tr>
			<td style="padding:0px 5px;font-size: 15px; color: #895621;"><?php echo $namaz['name'];?></td>
			<td style="padding:0px 5px;font-size: 15px; color: #895621;"><?php echo $namaz['namaz_time'];?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<div class="namaz_schedule" style="font-size: 12px; font-family: tahoma;">
	<h3 style="text-align:center;background-color: #895621; padding: 6px 8px 6px 8px;color: #fff;" >বিভাগ সমূহ </h3>
	<table style="width: 100%;border: 1px solid #ddd;">
		<?php 
			foreach($categories as $category):
		?>
		<tr>
			<td><a href="/index.php/home/category/<?php echo $category['category_id'];?>" style="font-size: 15px; color: #895621;"><?php echo ' >  '.$category['category_name'];?></a></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>