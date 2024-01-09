import React from "react";
import { Button } from "../ui/button";
import { ShoppingBag } from "lucide-react";

const ProductTotal = ({price}) => {
  return (
    <div className=" background_primary w-fit flex mt-10 items-center gap-3 rounded-lg p-3">
      <p className="text_primary whitespace-nowrap text-lg font-semibold">
       {price}$
      </p>
      <Button variant="secondary" size="sm">
        <ShoppingBag className="w-4" />
      </Button>
      <Button className="w-full max-w-fit " size="sm">
        Mua hàng
      </Button>
    </div>
  );
};

export default ProductTotal;
