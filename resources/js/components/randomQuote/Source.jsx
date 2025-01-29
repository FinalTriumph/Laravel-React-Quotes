import React from 'react';

export default function Source({ source }) {
    if (!source) {
        return (null);
    }

    return (<p className="text-custom-accent text-sm italic mb-4">source: {source}</p>);
}