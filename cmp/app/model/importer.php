<?php
class Importer
{
	private $working_file_id;
	private $tag_id;


	public function __construct()
	{

	}

	public function save($data)
	{
        $working_file = new db_WorkingFile();
        $working_file_id = $working_file->insert($data);

        $tags = $data->tags;

        if($this->hasTag($tags)){
        	$this->working_file_id = $working_file_id;
            
            foreach($tags as $tag){
                $this->saveTag($tag);
            }
        }	

        return $working_file_id;
    }

    private function saveTag($tags)
    {
        $tag = new db_Tags();
        $tag_id = $tag->insert($tags);
        if($tag_id){
        	$this->tag_id = $tag_id;
            $this->saveRelationTagWorkingFile();
        }

        return;        
    }

    private function saveRelationTagWorkingFile()
    {
		$working_file_tag = new db_WorkingFileTagMap();
		$working_file_tag_id = $working_file_tag->insert($this->tag_id, $this->working_file_id);

		return;
    }

    private function hasTag($tags)
    {
    	return count($tags)>0;
    }
}
?>