import React from "react";
import { Button } from "../ui/button";
import { ShoppingBag } from "lucide-react";

const ProductTotal = () => {
  return (
    <div className=" background_primary fixed bottom-0 right-0 flex w-full items-center gap-3 rounded-lg p-3">
      <p className="text_primary whitespace-nowrap text-lg font-semibold">
        1.230.000 vnđ
      </p>
      <Button variant="secondary" size="sm">
        <ShoppingBag className="w-4" />
      </Button>
      <Button className="w-full  " size="sm">
        Mua hàng
      </Button>
    </div>
  );
};

export default ProductTotal;
