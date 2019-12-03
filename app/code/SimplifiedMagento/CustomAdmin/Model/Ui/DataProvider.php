<?php
namespace SimplifiedMagento\CustomAdmin\Model\Ui;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    protected $collectionFactory;
    protected $loadedData;
    protected $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->meta = $this->prepareMeta($this->meta);
    }

    /**
     * Prepares Meta
     *
     * @param array $meta
     * @return array
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        $data = $this->dataPersistor->get('member');
        if (!empty($data)) {
            $custom_admin = $this->collection->getNewEmptyItem();
            $custom_admin->setData($data);
            $this->loadedData[$custom_admin->getId()] = $custom_admin->getData();
            $this->dataPersistor->clear('member');
        }
         //var_dump($this->loadedData);
        return $this->loadedData;
    }
}
