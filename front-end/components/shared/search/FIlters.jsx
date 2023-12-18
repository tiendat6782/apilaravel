import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import React from "react";

const Filters = () => {
  return (
    <div>
      {" "}
      <Select>
        <SelectTrigger className="w-fit max-w-[300px] gap-2 border-none">
          <SelectValue placeholder="Chọn danh mục" />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value="1">1</SelectItem>
          <SelectItem value="2">2</SelectItem>
          <SelectItem value="3">3</SelectItem>
        </SelectContent>
      </Select>
    </div>
  );
};

export default Filters;
