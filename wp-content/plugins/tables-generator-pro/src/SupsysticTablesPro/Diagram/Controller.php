<?php

/**
 * Class SupsysticTablesPro_Diagram_Controller
 */
class SupsysticTablesPro_Diagram_Controller extends SupsysticTables_Core_BaseController
{
    /**
     * @var \SupsysticTablesPro_Diagram_Model_Diagrams
     */
    private $diagrams;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        Rsc_Environment $environment,
        Rsc_Http_Request $request
    )
    {
        parent::__construct(
            $environment,
            $request
        );

        $this->diagrams = $this->getModel('diagrams', 'diagram');
    }

    /**
     * Saves the diagram.
     * @param \Rsc_Http_Request $request
     * @return \Rsc_Http_Response
     */
    public function saveAction(Rsc_Http_Request $request)
    {
        $data = $request->post->get(
            array('data', 'table_id')
        );

        try {
            $id = $this->diagrams->add($data);

            return $this->ajaxSuccess(array('id' => (int)$id));
        } catch (Exception $e) {
            return $this->ajaxError($e->getMessage());
        }
    }

    /**
     * Removes the diagram.
     * @param \Rsc_Http_Request $request
     * @return \Rsc_Http_Response
     */
    public function removeAction(Rsc_Http_Request $request)
    {
        $id = (int)$request->post->get('id');

        try {
            $this->diagrams->removeById($id);

            return $this->ajaxSuccess();
        } catch (RuntimeException $e) {
            return $this->ajaxError($e->getMessage());
        }
    }
}