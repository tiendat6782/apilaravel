"use client";
import { Button } from "@/components/ui/button";
import { Plus } from "lucide-react";
import React, { useState } from "react";

const SelectQuantity = () => {
  const [quantity, setQuantity] = useState(0);
  const handleIncrease = () => {
    setQuantity(quantity + 1);
  };
  const handleDecrease = () => {
    setQuantity(quantity - 1);
  };
  return (
    <div className="flex_between">
      <Button
        onClick={handleDecrease}
        variant="icon"
        size="xs"
        className="border_primary"
      >
        <Plus className="w-4" />
      </Button>
      <p className="px-1 text-xs font-semibold">{quantity}</p>
      <Button
        onClick={handleIncrease}
        variant="icon"
        size="xs"
        className="border_primary"
      >
        <Plus className="w-4" />
      </Button>
    </div>
  );
};

export default SelectQuantity;
