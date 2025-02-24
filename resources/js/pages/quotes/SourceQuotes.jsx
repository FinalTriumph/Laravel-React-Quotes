import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function SourceQuotes({ page, source, sources }) {
    return (
        <div className="text-left">
            <SectionTitle title={`All saved quotes from source: ${source}`} />
            <QuotesContainer type="source" page={page} source={source} sources={sources} />
        </div>
    );
}